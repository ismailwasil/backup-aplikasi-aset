<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_SPM_model extends CI_Model
{
    public function getDataSPM1($reg = null, $tgl_aju = null)
    {
        // if ($reg === null) {
        //     return $this->db->get('spm_masuk')->result_array();
        // } else {
        //     return $this->db->get_where('spm_masuk', ['reg' => $reg])->result_array();
        // }

        // $this->db->select('*');
        // $this->db->from('spm_masuk');
        // if ($reg) {
        //     $this->db->where('reg', $reg);
        // }
        // if ($tgl_aju) {
        //     $this->db->like('tgl_aju', $tgl_aju, 'after');
        // }
        if ($reg === null) {
            if ($tgl_aju) {
                $queryData = "SELECT * FROM spm_masuk WHERE tgl_aju LIKE '$tgl_aju%'";
                // $this->db->like('tgl_aju', $tgl_aju, 'after');
            } else {
                $queryData = "SELECT * FROM spm_masuk";
                // $queryData = "SELECT * FROM spm_masuk";
            }
        } else {
            if ($tgl_aju) {
                $queryData = "SELECT * FROM spm_masuk WHERE reg=$reg AND tgl_aju LIKE '$tgl_aju%'";
                // $this->db->where('reg', $reg);
                // $this->db->like('tgl_aju', $tgl_aju, 'after');
            } else {
                $queryData = "SELECT * FROM spm_masuk WHERE reg=$reg";
                // $this->db->where('reg', $reg);
            }
        }

        // $query = $this->db->get();
        $query = $this->db->query($queryData);
        return $query->result_array();
    }
    public function getDataSPM($reg = null, $tgl_aju = null)
    {
        $this->db->select('*');
        $this->db->from('spm_masuk');
        if ($reg) {
            $this->db->where('reg', $reg);
        }
        if ($tgl_aju) {
            $this->db->like('tgl_aju', $tgl_aju, 'after');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    // ===== Tabel SPM server-side (DataTables): paging/search/sort di database memakai LIMIT =====
    // key kolom => kolom SQL yang boleh dipakai untuk sorting (whitelist)
    private $sspSortMap = [
        'tgl_aju'    => 'spm_masuk.tgl_aju',
        'tgl_verif'  => 'spm_masuk.tgl_verif',
        'reg'        => 'spm_masuk.reg',
        'name'       => 'data_user.name',
        'no_spm'     => 'spm_masuk.no_spm',
        'jenis'      => 'spm_masuk.jenis',
        'total_spm'  => 'spm_masuk.total_spm',
        'verifikator' => 'spm_masuk.verifikator',
        'status'     => 'spm_masuk.id_status',
    ];

    // kolom yang ikut dicari pada kotak Search
    private $sspSearchCols = [
        'spm_masuk.tgl_aju',
        'spm_masuk.tgl_verif',
        'spm_masuk.reg',
        'data_user.name',
        'spm_masuk.no_spm',
        'spm_masuk.jenis',
        'spm_masuk.total_spm',
        'spm_masuk.verifikator',
        'status_spm.status',
    ];

    private function ssp_base($tahun, $status, $skpd)
    {
        $this->db->from('spm_masuk');
        $this->db->join('status_spm', 'status_spm.id = spm_masuk.id_status');
        $this->db->join('data_user', 'spm_masuk.skpd = data_user.id');
        // range tanggal (bisa memakai index), bukan LIKE '2026%'
        $this->db->where('spm_masuk.tgl_aju >=', $tahun . '-01-01');
        $this->db->where('spm_masuk.tgl_aju <', ($tahun + 1) . '-01-01');
        if ($status !== null) {
            $this->db->where('spm_masuk.id_status', (int) $status);
        }
        if ($skpd !== null) {
            $this->db->where('spm_masuk.skpd', (string) $skpd);
        }
    }

    private function ssp_search($term)
    {
        $tokens = preg_split('/\s+/', trim((string) $term), -1, PREG_SPLIT_NO_EMPTY);
        $tokens = array_slice($tokens, 0, 5);
        foreach ($tokens as $tok) {
            $this->db->group_start();
            foreach ($this->sspSearchCols as $i => $col) {
                $i === 0 ? $this->db->like($col, $tok) : $this->db->or_like($col, $tok);
            }
            $this->db->group_end();
        }
        return count($tokens) > 0;
    }

    /**
     * @param array $o tahun, status(int|null), skpd(string|null), search, start, length,
     *                 order_key(string|null), order_dir, default_order_key
     */
    public function ssp_get($o)
    {
        // total (tanpa search)
        $this->ssp_base($o['tahun'], $o['status'], $o['skpd']);
        $total = $this->db->count_all_results();

        // filtered
        $filtered = $total;
        if ($o['search'] !== '') {
            $this->ssp_base($o['tahun'], $o['status'], $o['skpd']);
            $this->ssp_search($o['search']);
            $filtered = $this->db->count_all_results();
        }

        // data halaman aktif
        $this->db->select('spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_aju, spm_masuk.tgl_verif, spm_masuk.reg,
            data_user.name, spm_masuk.no_spm, spm_masuk.jenis, spm_masuk.dokumen, spm_masuk.total_spm,
            spm_masuk.verifikator, spm_masuk.id_status, spm_masuk.catatan, status_spm.kelas, status_spm.status');
        $this->ssp_base($o['tahun'], $o['status'], $o['skpd']);
        if ($o['search'] !== '') {
            $this->ssp_search($o['search']);
        }

        $dir = strtoupper($o['order_dir']) === 'ASC' ? 'ASC' : 'DESC';
        if ($o['order_key'] && isset($this->sspSortMap[$o['order_key']])) {
            $this->db->order_by($this->sspSortMap[$o['order_key']], $dir);
        } else {
            $this->db->order_by($this->sspSortMap[$o['default_order_key']], 'DESC');
        }
        $this->db->order_by('spm_masuk.id', 'DESC'); // urutan stabil antar halaman
        $this->db->limit($o['length'], $o['start']);

        return [
            'total'    => $total,
            'filtered' => $filtered,
            'rows'     => $this->db->get()->result_array(),
        ];
    }
}

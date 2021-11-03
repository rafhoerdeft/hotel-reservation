<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Modules\Auth\Models;


use CodeIgniter\Model;

class MasterData extends Model
{
	// protected $db = \Config\Database::connect();

	public function getData($table)
	{
		$builder = $this->db->table($table);
		return $builder->get();
	}
	public function getDataDesc($table, $order)
	{
		$builder = $this->db->table($table);
		return $builder->orderBy($order, 'DESC')
			->get();
	}
	public function getSelectData($select, $table)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->get();
	}
	public function getSelectDataOrder($select, $table, $by, $order)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->orderBy($by, $order)
			->get();
	}
	public function getWhereDataAll($table, $where)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT('*')
			->WHERE($where)
			->get();
	}
	public function getWhereDataAllDesc($table, $where, $order)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT('*')
			->WHERE($where)
			->orderBy($order, 'DESC')
			->get();
	}
	public function getWhereData($select, $table, $where)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->WHERE($where)
			->get();
	}
	public function getDataWhere($table, $where)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT('*')
			->WHERE($where)
			->get();
	}
	public function getWhereDataLimit($select, $table, $where, $limit)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->WHERE($where)
			->LIMIT($limit)
			->get();
	}
	public function getWhereDataLimitOrder($select, $table, $where, $limit, $by, $order)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->WHERE($where)
			->LIMIT($limit)
			->orderBy($by, $order)
			->get();
	}
	public function getWhereDataOrder($select, $table, $where, $by, $order)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->WHERE($where)
			->orderBy($by, $order)
			->get();
	}

	public function getDataOrder($table, $order)
	{
		$builder = $this->db->table($table);
		return $builder->orderBy($order, 'ASC')
			->get();
	}

	public function getDataGroup($select, $table, $group)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->groupBy($group)
			->get();
	}
	public function getDataGroupOrder($select, $table, $group, $by, $order)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->groupBy($group)
			->orderBy($by, $order)
			->get();
	}
	public function getDataGroupOrderWhere($select, $table, $group, $by, $order, $where)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->WHERE($where)
			->groupBy($group)
			->orderBy($by, $order)
			->get();
	}
	public function getDataGroupAll($table, $group)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT('*')
			->groupBy($group)
			->get();
	}
	public function countData($table)
	{
		$builder = $this->db->table($table);
		return $builder->countAllResults($table);
	}

	public function selectJoin($select, $table, $join, $on, $method, $where)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			->join($join, $on, $method)
			// ->from($table)
			->WHERE($where)
			->get();
	}
	public function selectJoinNot($select, $field, $table, $where)
	{
		$builder = $this->db->table($table);
		return $builder->SELECT($select)
			// ->from($table)
			->WHERE($where)
			->whereNotIn($field, $table)
			->get();
	}
	public function inputData($data, $table)
	{
		$builder = $this->db->table($table);
		return $builder->insert($data);
	}
	public function replaceData($data, $table)
	{
		$builder = $this->db->table($table);
		return $builder->replace($table, $data);
	}
	public function editData($where, $data, $table)
	{
		$builder = $this->db->table($table);
		$builder->set($data);
		$builder->where($where);
		return $builder->update();
	}
	public function editData2($where, $data, $table)
	{
		return $this->db->query("UPDATE $table SET $data WHERE $where");
	}
	public function deleteData($where, $table)
	{
		$builder = $this->db->table($table);
		// $builder->where($where);
		return $builder->delete($where);
	}
	public function cekLogin($table, $where)
	{
		$builder = $this->db->table($table);
		return $builder->getWhere($table, $where);
	}

	// public function pelaporan(){
	// $builder = $this->db->table($table);	
	// return $builder->query("select id_pelaporan, (SELECT nama_client from client WHERE client.id_client=tbl_pelaporan.id_client) as nama_pengguna, (SELECT instansi from client WHERE client.id_client=tbl_pelaporan.id_client) as instansi, (SELECT kontak_client from client WHERE client.id_client=tbl_pelaporan.id_client) as kontak_pengguna, media_pelaporan, tgl_pelaporan, deskripsi_pelaporan from tbl_pelaporan where id_pelaporan NOT IN (SELECT id_pelaporan from tbl_klasifikasi where tbl_pelaporan.id_pelaporan=tbl_klasifikasi.id_pelaporan)");
	// }	
}

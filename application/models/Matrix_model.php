<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Matrix_model extends CI_Model {

    protected $db_table = '';
    private $db_engine = 'mysql'; 

    function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    
    public function get_by_criteria(array $criteria, bool $one_result = FALSE, array $order_by = [])
	{
		if (!empty($order_by)) 
		{
			foreach ($order_by as $key => $order) 			
				$this->db->order_by($key, $order);
		}

		if (empty($criteria)) 
			return ($this->db->get($this->db_table))->result();
			 
		$query = $this->db->get_where($this->db_table, $criteria);
		return  ($one_result) ? $query->row() :  $query->result();
	}

	public function get_by_criteria_with_max_func(array $criteria, string $max_field)
	{
		$this->db->select_max($max_field);
		$this->db->where($criteria);
		$query = $this->db->get($this->db_table);
		return ($query->num_rows() > 0) ?  $query->row() : NULL;
	}

	public function count_results_by_criteria(array $criteria = []) :int
	{
		if (empty($criteria))
			return count(($this->db->get($this->db_table))->result());
		$query = $this->db->get_where($this->db_table, $criteria);
		return  count($query->result());
	}

	public function get_by_similar_criteria(array $criteria) :array
	{
		$this->db->or_like($criteria);
		return ($this->db->get($this->db_table))->result();
	}

	public function get_all() :array
	{
		return ($this->db->get($this->db_table))->result();
	}

	public function count_results(array $criteria = []) :int
	{
		if (empty($criteria)) 
			return $this->db->count_all_results($this->db_table);
		$this->db->where($criteria);
		$this->db->from($this->db_table);
		return $this->db->count_all_results();		
	}

	/*
	*  Equivalent to insert data into a table
	*   return: id with which the data was saved
	*/
	public function save(array $data) :int
	{
		$this->db->insert($this->db_table, $data);
		return $this->db->insert_id();
	}

	public function update(array $data, string $where, $equalsTo)
	{
		$this->db->where($where, $equalsTo);
		$this->db->update($this->db_table, $data);
	}

	public function remove(array $criteria)
	{
		$this->db->delete($this->db_table, $criteria);
	}

	public function exists_in_db(array $criteria) :bool
	{
		return  (NULL !== (($this->db->get_where($this->db_table, $criteria))->row()));	
	}
}



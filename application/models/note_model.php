<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class note_model extends CI_Model {

	public function addNote($note)
	{
		$query = "INSERT INTO notes (title, description, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
		
		$result = $this->db->query($query, array($note['title'], $note['description']));
		return ($result);
	}

	public function getNotes()
	{
		$query = "SELECT * FROM notes ORDER BY created_at DESC";
		$result = $this->db->query($query)->result_array();
		return ($result);
	}

	public function deleteNote($data)
	{
		$query = "DELETE FROM notes WHERE id = ?";
		$result = $this->db->query($query, array($data['noteID']));
		return ($result);
	}
}

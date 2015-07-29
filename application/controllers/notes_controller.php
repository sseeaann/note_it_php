<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notes_controller extends CI_Controller {

	public function index()
	{
		$notes = $this->note_model->getNotes();
		$this->load->view('index', array('notes' => $notes));
	}

	public function create()
	{
		$result = $this->note_model->addNote($this->input->post());
		if ($result)
		{
			echo json_encode(array(
					"status" => "success",
					"request" => "create",
					"row" => $result
				));
		}
		else
		{
			echo "Uh oh Spaghetti-O!";
		}
	}

	public function delete()
	{
		$delete = $this->note_model->deleteNote($this->input->post());
		if ($delete)
		{
			echo json_encode("Successful deletion");
		}
		else
		{
			echo "Could not delete note.";
		}
	}
}

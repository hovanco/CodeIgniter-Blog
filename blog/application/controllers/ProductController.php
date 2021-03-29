<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller 
{
  public function index()
  {
    
  }

  public function show($id)
  {
    $this->load->view('');
  }

  public function create()
  {
    $this->load->view('');
  }

  public function store()
  {

  }
  
  public function edit($id)
  {
    $this->load->view('');
  }

  public function update()
  {

  }

  public function destroy()
  {

  }

  public function getProduct()
  {
    $dataUser = 10;
  }
}
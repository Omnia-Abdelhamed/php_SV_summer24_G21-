@extends('admin.layouts.app')
@section('breadCrumb')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Add Student</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Students</a></li>
              <li class="breadcrumb-item active" aria-current="page">
              <a href="#" class="active">Add New</a></li>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
<div class="card">
    <form class="form-horizontal" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
      <div class="card-body">
      <div class="form-group row">
          <label
            for="ssn"
            class="col-sm-3 text-end control-label col-form-label"
            >SSN</label
          >
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="ssn"
              placeholder="SSN Here"
              name="ssn"
            />
          </div>
        </div>
        <div class="form-group row">
          <label
            for="fname"
            class="col-sm-3 text-end control-label col-form-label"
            >Fname</label
          >
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="fname"
              placeholder="First Name Here"
              name="fname"
            />
          </div>
        </div>
        <div class="form-group row">
          <label
            for="fname"
            class="col-sm-3 text-end control-label col-form-label"
            >Lname</label
          >
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="lname"
              placeholder="Last Name Here"
              name="lname"
            />
          </div>
        </div>
        <div class="form-group row">
          <label
            for="email"
            class="col-sm-3 text-end control-label col-form-label"
            >Email</label
          >
          <div class="col-sm-9">
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="Email Here"
              name="email"
            />
          </div>
        </div>
        <div class="form-group row">
          <label
            for="image"
            class="col-sm-3 text-end control-label col-form-label"
            >Image</label
          >
          <div class="col-sm-9">
            <input
              type="file"
              class="form-control"
              id="image"
              placeholder="First Name Here"
              name="image"
            />
          </div>
        </div>
        <div class="form-group row">
        <label
            for="email"
            class="col-sm-3 text-end control-label col-form-label"
            >Gender</label
          >
          <div class="col-md-9">
            <div class="form-check">
              <input
                type="radio"
                class="form-check-input"
                id="customControlValidation1"
                name="gender"
                value="m"
              />
              <label
                class="form-check-label mb-0"
                for="customControlValidation1"
                >Male</label
              >
            </div>
            <div class="form-check">
              <input
                type="radio"
                class="form-check-input"
                id="customControlValidation2"
                name="gender"
                value="f"
              />
              <label
                class="form-check-label mb-0"
                for="customControlValidation2"
                >Female</label
              >
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label
            for="fname"
            class="col-sm-3 text-end control-label col-form-label"
            >Department</label
          >
          <div class="col-sm-9">
            <select class="form-control" name="dno">
                <option value=""></option>
            </select>
          </div>
        </div>
      </div>
      <div class="border-top">
        <div class="card-body">
          <button type="submit" class="btn btn-primary">
            Add
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection

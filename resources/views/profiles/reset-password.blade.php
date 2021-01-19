@extends('layouts.master')
@section('content')
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ganti Password</h4>
                                
                                <form class="form-horizontal p-t-20">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="pass3" class="col-sm-3 control-label">Password*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="pass3" placeholder="Enter pwd">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                    <i class="ti-lock"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass4" class="col-sm-3 control-label">Re-Password*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="pass4" placeholder="Re Enter pwd">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                    <i class="ti-lock"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <div class="checkbox checkbox-success">
                                                <input id="checkbox35" type="checkbox">
                                                <label for="checkbox35">Check me out !</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-0">
                                        <div class="offset-sm-3 col-sm-9 ">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
@endsection
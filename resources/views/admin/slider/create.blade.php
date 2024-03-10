@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Slider</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Slider Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" 
                            placeholder="Enter title" name="title">
                            
                        </div>
                        
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" 
                                rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Image</label>
                                <input type="file" class="form-control-file" 
                                id="exampleFormControlFile1" name="image">
                            </div>
                            <div class="form-footer pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                            {{-- <div class="card card-default">
                                <div class="card-header card-header-border-bottom">
                                    <h2>Form pill</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form-pill">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput3">Email address</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlPassword3">Password</label>
                                            <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect3">Example select</label>
                                            <select class="form-control" id="exampleFormControlSelect3">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}

                            {{-- <div class="card card-default">
                                <div class="card-header card-header-border-bottom">
                                    <h2>Input Sizing</h2>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="">Large input</label>
                                            <input type="text" class="form-control input-lg" placeholder="Large input">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Default input</label>
                                            <input type="text" class="form-control" placeholder="Default input">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Small input</label>
                                            <input type="text" class="form-control input-sm" placeholder="Small input">
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
@endsection













@extends('home')
@section('content')
<style type="text/css">
    .nice-select {
        width: 100%;
        line-height: 30px;
    }
    .list {
        width: 100%;
    }
</style>

    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-5">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                        <br>
                        @if (auth()->user()->hasRole('admin_shop'))
                            <form action="/homepage/store" method="POST" style="color: #fff" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="department">Category</label>
                                    <select class="form-control" name="category_id" id="department">
                                        @foreach($departments as $department)
                                            <option  value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" required="required" class="form-control" id="title"
                                           placeholder="Tilte Post">
                                </div>
                                <div class="form-group">
                                    <label for="content">Description</label>
                                    <textarea class="form-control" name="content" id="content" rows="8"
                                              cols="8"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" required="required" class="form-control" id="price"
                                           placeholder="Input Price by $">
                                </div>
                                <div class="form-group">
                                    <label for="offer">Offer</label>
                                    <input type="text" name="offer" class="form-control" id="offer"
                                           placeholder="Input Price by $">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" required="required" class="form-control" id="photo">
                                </div>
                                <button type="submit" style="margin-top: 30px; margin-left: 30px" class="button3D">
                                    <span>Create</span>
                                    <span></span>
                                    <span></span>
                                    <span>Create</span>
                                </button>
                                <br><br><br><br>
                                <br><br><br><br>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


@endsection


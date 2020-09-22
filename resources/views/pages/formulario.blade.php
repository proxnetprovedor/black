@extends('layouts.admin')

@section('title','Formulario')

@section('content')
<div class="col-md-12">
    <div class="card ">
      <div class="card-header card-header-purple card-header-icon">
        <div class="card-icon">
          <i class="material-icons">mail_outline</i>
        </div>
        <h4 class="card-title">Stacked Form</h4>
      </div>
      <div class="card-body ">
        <form method="#" action="#">
          <div class="form-group">
            <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
            <input type="email" class="form-control" id="exampleEmail">
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" value=""> Subscribe to newsletter
              <span class="form-check-sign">
                <span class="check"></span>
              </span>
            </label>
          </div>
        </form>
      </div>
      <div class="card-footer ">
        <button type="submit" class="btn btn-fill btn-rose">Submit</button>
      </div>
    </div>
</div>
  <!-- end col-md-12 -->

<div class="col-md-12">
  <div class="card">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="card-header">
          <h4 class="card-title">Modal</h4>
        </div>
        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#myModal">
          Classic modal
        </button>
        <button class="btn btn-info btn-round" data-toggle="modal" data-target="#noticeModal">
          Notice modal
        </button>
        <button class="btn btn-rose btn-round" data-toggle="modal" data-target="#myModal10">
          Small alert modal
        </button>
        <!-- Classic Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  <i class="material-icons">clear</i>
                </button>
              </div>
              <div class="modal-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
                </p>
                <div class="form-group bmd-form-group is-filled">
                  <label class="label-control">Datetime Picker</label>
                  <input type="text" class="form-control datetimepicker" value="07/02/2018">
                  <span class="material-input"></span>
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-link">Nice Button</button>
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!--  End Modal -->
        <!-- notice modal -->
        <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-notice">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">How Do You Become an Affiliate?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  <i class="material-icons">close</i>
                </button>
              </div>
              <div class="modal-body">
                <div class="instruction">
                  <div class="row">
                    <div class="col-md-8">
                      <strong>1. Register</strong>
                      <p class="description">The first step is to create an account at
                        <a href="http://www.creative-tim.com/">Creative Tim</a>. You can choose a social network or go for the classic version, whatever works best for you.</p>
                    </div>
                    <div class="col-md-4">
                      <div class="picture">
                        <img src="../../assets/img/card-1.jpg" alt="Thumbnail Image" class="rounded img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="instruction">
                  <div class="row">
                    <div class="col-md-8">
                      <strong>2. Apply</strong>
                      <p class="description">The first step is to create an account at
                        <a href="http://www.creative-tim.com/">Creative Tim</a>. You can choose a social network or go for the classic version, whatever works best for you.</p>
                    </div>
                    <div class="col-md-4">
                      <div class="picture">
                        <img src="../../assets/img/card-2.jpg" alt="Thumbnail Image" class="rounded img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
                <p>If you have more questions, don't hesitate to contact us or send us a tweet @creativetim. We're here to help!</p>
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Sounds good!</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end notice modal -->
        <!-- small modal -->
        <div class="modal fade modal-mini modal-primary" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-small">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to do this?</p>
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-link" data-dismiss="modal">Never mind</button>
                <button type="button" class="btn btn-success btn-link">Yes
                  <div class="ripple-container"></div>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--    end small modal -->
      </div>
    </div>
  </div>
</div>


@endsection



@extends('layouts.masters.main')

@section('page-content')

  

  @include('layouts.masters.nav')
  <!-- <div class="container"> -->
    <div class="col-md-12" id="carouselContainer">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox" style=" width:100%; height: 500px !important;">
          @if (empty($slide))
            <div class="item active">
                <img class="second-slide" src="" alt="Kosong">
                <div class="container">
                    <div class="carousel-caption">
                        <p>Tidak ada slide yang ditampilkan saat ini.</p>
                    </div>
                </div>
            </div>
          @else
            <?php $i = 1; ?>
            @foreach ($slide as $value)
              @if ($i == 1)
                <div class="item active">
                    <img class="second-slide" src="{{ $value->image_path }}/{{ $value->image_name }}" alt="First Slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>{{ $value->title }}</h3>
                            <p><?php echo $value->info; ?></p>
                        </div>
                    </div>
                </div>
                <?php $i += 1; ?>
              @else
                <div class="item">
                    <img class="second-slide" src="{{ $value->image_path }}/{{ $value->image_name }}" alt="Second Slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>{{ $value->title }}</h3>
                            <p><?php echo $value->info; ?></p>
                        </div>
                    </div>
                </div>
              @endif
            @endforeach
          @endif
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

  <div class="container">
    <div class="col-md-9" id="content">
        <?php $i=0; ?>
        @forelse($posts as $post)

          <div class="panel panel-info">
            <h4 class="panel-heading" >
              <div class="box-tools pull-right">
                <a data-toggle="collapse" data-target="#panel-body-foobar{{$i}}">
                <label class="btn btn-box-tool" data-toogle="collapse" data-target="#panel-body-foobar{{$i}}">
                <i class="fa fa-minus"></i></button>
                </a>
              </div>
            <p><a href="question/{{$post->id}}">{{ $post->title }}</a></p>
            <p class="text-right">By : {{ $post->user->name }}</p>
            </h4>

              <div class="panel-body collapse" id="panel-body-foobar{{$i}}">     
                <p><?php echo $post->body; ?></p>
              </div>

              <div class="panel-footer">
                <ul class="list-inline list-unstyled">
                  <li><span><i class="glyphicon glyphicon-calendar"></i> {{ $post->created_at->diffForHumans()}}</span></li>
                  <li>|</li>

                  @if( $post->replies->count() > 0)
                    <li> {{ $post->replies->count() }} Comments</li>
                  @else
                    <li>Be the first to reply</li>
                  @endif
                </ul>
              
                @if(Auth::User() && Auth::User()->id == $post->user_id)

                  {!! Form::open(['url' => 'question/posts', 'id' => 'delete-question-form','method' =>'DELETE', 'class' => 'text-right']) !!}

                    {!! Form::hidden('post_id', $post->id) !!}

                    {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}

                  {!! Form::close() !!}

                @endif
              </div>
              <?php $i++; ?>  
          </div>
        @empty
          <p>No posts found</p>
          
        @endforelse

        {!! $posts->appends(Request::all())->render() !!}
    </div>


    <!--mid column-->
      <div class="col-md-3">
          <div class="panel" id="midCol">
            <div class="panel-heading" style="background-color:#555;color:#eee;">New Stories</div> 
            <div class="panel-body">
              
              <img class="img-responsive" src="//placehold.it/300/77CCDD/66BBCC">

              <div class="well">
                      <img src="http://s.bootply.com/assets/example/bg_iphone.png" class="img-responsive">
                      <h3><a href="http://getbootstrap.com">Lorem Ipsum.</a></h3>
                      <p>
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                      </p>
                      <p><a href="http://www.bootply.com/bootstrap-3-migration-guide" target="ext">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</a></p>
              </div>

              
              <hr>
              
              <h3>Top Members</h3>
              
              <h5><a href="#"><i class="glyphicon glyphicon-user"></i> John Chapman</a></h5>
              <h5><a href="#"><i class="glyphicon glyphicon-user"></i> Max Axleton</a></h5>
              <h5><a href="#"><i class="glyphicon glyphicon-user"></i> Devin Skelly</a></h5>
              <h5><a href="#"><i class="glyphicon glyphicon-user"></i> Katie Kowalski</a></h5>
              <h5><a href="#"><i class="glyphicon glyphicon-user"></i> Amet Deberge</a></h5>
            
              <hr>  
              
              <img class="img-responsive" src="//placehold.it/300x200/FFF">    
              
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/80/F0F0F0">
                </a>
                <div class="media-body">
                  <h5 class="media-heading"><a href="/tagged/modal" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>Modal</strong></a></h5>
                  <small>Examples using the Bootstrap modal.</small><br>
                  <span class="badge">87</span>
                </div>
              </div>
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/80/F0F0F0">
                </a>
                <div class="media-body">
                  <h5 class="media-heading"><a href="/tagged/slider" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>Carousel</strong></a></h5>
                  <small>How to use the Bootstrap slider.</small><br>
                  <span class="badge">322</span>
                </div>
              </div>
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/80/F0F0F0">
                </a>
                <div class="media-body">
                  <h5 class="media-heading"><a href="/tagged/typography" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>Typography</strong></a></h5>
                  <small>See the various textual elements and options.</small><br>
                  <span class="badge">44</span>
                </div>
              </div>
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/80/F0F0F0">
                </a>
                <div class="media-body">
                  <h5 class="media-heading"><a href="/tagged/media" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>@Media</strong></a></h5>
                  <small>Use @media queries to get the layout you want.</small><br>
                  <span class="badge">119</span>
                </div>
             </div>
              
           </div> 
           </div><!--/panel-->
      </div><!--/end mid column-->

  </div> <!-- /container -->

@stop

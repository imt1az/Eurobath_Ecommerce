

@php
    $innerBanner = \App\Models\InnerBanner::get()->first();
@endphp

@if($innerBanner->status == 0)

@else
    <div id="category" class="category-carousel hidden-xs">
        <div class="item">
            <div class="image"><img src="{{asset($innerBanner->innerBanner_img)}} " alt=""
                                    class="img-responsive"></div>
            <div class="container-fluid">
                <div class="caption vertical-top text-left">
                    <div class="big-text">{{$innerBanner->title}}</div>
                    <div class="excerpt hidden-sm hidden-md">{{$innerBanner->description}}</div>
                    <div class="excerpt-normal hidden-sm hidden-md"></div>
                </div>
                <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endif

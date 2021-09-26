<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="blog-header">
                <h3>Blog</h3>
            </div>
            <div class="blog-listitem row">
            @if(count($advanced_data['best_items']) > 0)  
            @foreach($blogs_all_data as $row)
                <div class="blog-item col-md-4 col-sm-6">
                    <div class="blog-item-inner" style="border: 1px solid #dadada;">
                        <div class="itemBlogImg left-block">
                            <div class="article-image banners">
                                <div>
                                    <a class="" href="{{ route('blog-single-page', $row['post_slug']) }}">
                                        @if(!empty($row['featured_image']))
                                        <img  src="{{ get_image_url($row['featured_image']) }}" alt="{{ basename($row['featured_image']) }}">
                                      @else
                                        <img src="{{ default_placeholder_img_src() }}" alt="media">
                                      @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="itemBlogContent right-block ">
                            <div class="blog-content">
                                <div class="article-date">
                                    <div class="date">
                                        <span class="article-date">
                                            <b>&nbsp;{{ Carbon\Carbon::parse($row['created_at'])->format('d') }}</b> &nbsp;{{ Carbon\Carbon::parse($row['created_at'])->format('F') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="article-title font-title">
                                    <h4><a href="blog-detail.html">{!! $row['post_title'] !!}</a></h4>
                                </div>
                                
                                        {!! get_limit_string(string_decode($row['post_content']), $row['allow_max_number_characters_at_frontend']) !!}
                                <div class="blog-meta" style="padding:0px;">
                                    <span class="comment_count"><a href="#">{!! $row['comments_details']['total'] !!} {!! trans('frontend.comments_label') !!}</a></span>
                                </div>
                                <div class="readmore ">
                                    <a class="btn-readmore font-title"  style="padding-top:10px;" href="{{ route('blog-single-page', $row['post_slug']) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <p>{!! trans('frontend.no_blogs_data_label') !!}</p>
            @endif
            </div>
        </div>
    </div>
</div>
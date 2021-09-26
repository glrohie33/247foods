@extends('layouts.frontend.master')
@if(!empty($blog_details_by_slug['blog_seo_title']))
  @section('title',  $blog_details_by_slug['blog_seo_title'] .' < '. get_site_title())
@else
  @section('title',  trans('frontend.blog_details_page_label') .' < '. get_site_title())
@endif
@section('content')
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12" style="max-width:850px;margin:0px auto; float:none; ">
                <div class="rows form-group">
                    <div class="article-info">
                        <div class="entry-wrap">
                            <div class="article-image">
                                    @if(!empty($blog_details_by_slug['featured_image']))
                                    <img class="img-responsive" src="{{ get_image_url($blog_details_by_slug['featured_image']) }}" alt="{{ basename($blog_details_by_slug['featured_image']) }}">
                                    @else
                                    <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="media">
                                    @endif
                            </div>
                            <div class="article-sub-title">
                                <span class="article-date pull-left"><b>&nbsp;{{ Carbon\Carbon::parse($blog_details_by_slug['created_at'])->format('d') }}</b> &nbsp;{{ Carbon\Carbon::parse($blog_details_by_slug['created_at'])->format('F') }}</span>
                                <div class="article-comment pull-right">
                                    <span><i class="fa fa-comments"></i>{!! $comments_rating_details['total'] !!} {!! trans('frontend.comments_label') !!}</span>
                                </div>
                            </div>
                            <div class="article-title">
                                <h3>{!! $blog_details_by_slug['post_title'] !!}</h3>
                            </div>
                            <div class="article-description" style="clear: both;">
                                    {!! string_decode($blog_details_by_slug['post_content']) !!}
                            </div>
                        </div>
                        <div class="panel panel-default related-comment">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div id="comments" class="blog-comment-info">
                                        <div id="comment-list">
                                                @if(count($comments_details) > 0)
                                                <ol class="commentlist">
                                                   @foreach($comments_details as $comment) 
                                                    <li class="comment">
                                                      <div class="comment-container clearfix">
                                                        <div class="user-img">
                                                          @if(!empty($comment->user_photo_url))
                                                          <img alt="" src="{{ get_image_url($comment->user_photo_url) }}" class="avatar photo">
                                                          @else
                                                          <img alt="" src="{{ default_avatar_img_src() }}" class="avatar photo">
                                                          @endif
                                                        </div>
                                                        <div class="comment-text">
                                                          <div class="star-rating">
                                                            <span style="width:{{ $comment->percentage }}%"><strong itemprop="ratingValue"></strong></span>
                                                          </div>
                                                          <p class="meta">
                                                            <span class="comment-date">{{ Carbon\Carbon::parse(  $comment->created_at )->format('F d, Y') }}</span> &nbsp; - <span class="comment-user-role"><strong >{!! trans('frontend.by_label') !!} {!! $comment->display_name !!}</strong></span>
                                                          </p>
                                                          <div class="description">
                                                            <p>{!! $comment->content !!}</p>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </li>
                                                    @endforeach
                                                </ol>
                                                @else
                                                <p>{!! trans('frontend.no_review_label') !!}</p>
                                                @endif
                                        </div>
                                        <div id="comment-section"></div>
                                      @if($blog_details_by_slug['allow_comments_at_frontend'] == 'yes')
                                        @include('pages-message.notify-msg-success')
                                        @include('pages-message.notify-msg-error')
                                        @include('pages-message.form-submit')

                                        <h2 id="review-title">
                                            Leave your comment
                                            <i class="fa fa-times-circle fa-lg" id="reply-remove" style="display:none; cursor: pointer;" onclick="removeCommentId();"></i>
                                        </h2>
                                        <form id="new_comment_form" method="post" action="" enctype="multipart/form-data">
                                            @include('includes.csrf-token')
                                            <input type="hidden" name="comments_target" id="comments_target" value="blog">
                                            <input type="hidden" name="selected_rating_value" id="selected_rating_value" value="">
                                            <input type="hidden" name="object_id" id="object_id" value="{{ $blog_details_by_slug['id'] }}">
                                            <div class="form-group contacts-form row">
                                                {{-- <div class="col-md-6">
                                                    <b>Name</b><br>
                                                    <input type="text" name="name" value="" class="form-control"><br>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <b>Comment</b><br>
                                                    <textarea name="product_review_content" id="product_review_content" class="form-control"></textarea>
                                                    <br><br>
                                                </div>
                                                <div class="col-md-12">
                                                </div>
                                            </div>
                                            <div class="text-left"><input type="submit" name="review_submit" id="button-comment" class="btn btn-info" value="LEAVE A COMMENT"></div>
                                        </form>
                                      @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
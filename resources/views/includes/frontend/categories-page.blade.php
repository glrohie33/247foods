@section('categories-page-content')

<div class="product-categories-accordian">
  <h2>{{ trans('frontend.category_label') }} <span class="responsive-accordian"></span></h2>
  @if (count($vertical_menu) > 0)
  <div class="panel-group category-accordian" id="accordian">
    @foreach ($vertical_menu as $menu)
        @include('pages.common.category-frontend-loop', $menu)
    @endforeach
  </div>
  @else
  <h5>{{ trans('frontend.no_categories_yet') }}</h5>
  @endif
</div>
 
@endsection 
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordian" href="#{{ str_replace(' ', '-', $menu['slug']) }}">
        <span class="pull-right">
          <i class="fa <?=(in_array($menu['term_id'], $product_by_cat_id['selected_cat']) || $menu['term_id'] == $product_by_cat_id['parent_id'])?'fa-minus':'fa-plus';?>"></i>
        </span>
        <i class="fa fa-angle-double-right"></i> &nbsp; 
        <span class="<?=in_array($menu['term_id'], $product_by_cat_id['selected_cat'])?'active':'';?>">{!! $menu['name'] !!}</span>
      </a>
    </h4>
  </div>
 <?php 
  $show = (in_array($menu['term_id'], $product_by_cat_id['selected_cat']) || $menu['term_id'] == $product_by_cat_id['parent_id']) ? 'show':'';
 ?>
 <div id="{{ str_replace(' ', '-', $menu['slug']) }}" class="cat-items panel-collapse collapse <?=$show?>" data-id="<?=$menu['term_id']?>">
    <div class="panel-body">
        {{-- @if(count($menu['children'])>0)
        <ul>
          @foreach($menu['children'] as $menu)
            @include('pages.common.category-frontend-loop-extra', $menu)
          @endforeach
        </ul>  
        @endif --}}
    </div>
  </div>
</div>  

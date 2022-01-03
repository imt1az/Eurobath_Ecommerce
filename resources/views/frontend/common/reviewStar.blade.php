@php
    $reviewcount = \App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();

    $average = \App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
@endphp



<style>
    .checked {
        color: orange;
    }
</style>




<div>
@if($average == 0)

@elseif($average ==1 || $average<2)
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>

@elseif($average ==2 || $average<3)
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>

@elseif($average ==3 || $average<4)
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>

@elseif($average ==4 || $average<5)
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>

@elseif($average ==5 || $average<5)
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>

@endif

</div>

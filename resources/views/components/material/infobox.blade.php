<div {{ $attributes->merge(['class'=>''.$col]) }}>
    <!-- small box -->
    <div {{ $attributes->merge(['class'=>'small-box bg-'.$color]) }}>
        <div class="inner">
            <h3>{{$count}}</h3>
            <p>{{$label}}</p>
            {{ isset($span) ? $span : null }}
        </div>
        <div class="icon">
            <i {{ $attributes->merge(['class'=>'ion ion-'.$icon]) }}></i>
        </div>
    </div>
</div>

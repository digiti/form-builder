<div class="conclusion">
    <h2 class="title">{!! __('fb::conclusion.title') !!}</h2>
    <p class="description">{!! __('fb::conclusion.description') !!}</p>

    @if ($result)
        <div class="results">
            @foreach ($result as $key => $value)
                @php($label = (string) Str::of($key)->afterLast('.')->kebab()->replace(['-', '_'], ' ')->ucfirst())

                <div class="item">
                    <p>
                        <span class="label">{{ $label }}:</span>
                        <span class="value">{{ is_array($value) ? implode(', ', $value) : $value }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <p>{!! __('fb::conclusion.no_input') !!}</p>
    @endif

</div>

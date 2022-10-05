<td {{ $attributes }}>
    @if ($value != '' && $title != '')
        <p style=" margin-top:  0; border-bottom:1px solid #999; margin : -5px; padding:2px">
            <b>
                {{ $title }}
            </b>
        </p>

        @if ($value != 'vacio')
        <p style="margin-top: 10px;margin-bottom: 5px; ">
            {{ $value }}
        </p>
        @else
        <p style="margin-top: 10px;margin-bottom: 5px; color:white">
            {{ $value }}
        </p>

        @endif
    @else
        <div class="text-left">

            @if ($title != '')
                <b>
                    {{ $title }}
                </b>
            @endif
            @if ($value != '')
                {{ $value }}
            @endif
        </div>
    @endif
</td>

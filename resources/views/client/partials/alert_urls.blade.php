@if (count($urls) == 0)
No Url Found.
@else

@foreach ($urls as $key=> $url)
<ul>
    <li>
        <input type="checkbox" name="urls" value="{{ $url }}" id="{{ $key }}" />
        <label for="{{ $key }}">{{ $url }}</label>
    </li>
</ul>
@endforeach
<div class="form-group">
    <input type="checkbox" id="checkAll" />
    <label for="checkAll">Check All</label>
</div>

<script>
    $('#checkAll').click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endif
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}

<div class="container">

    <h1 class="header margin-bottom-10">@lang('english.USER_SEARCH_HISTORY_DETAILS')</h1>
    <h5 class="margin-bottom-10">You need to select checkbox for see user details*</h5>
    <div class="row">
        <div class="col-md-6">
            <label><strong>@lang('english.ALL_KEYWORDS') :</strong></label><br>
            @if (!empty($keywordsArr))
                @foreach ($keywordsArr as $keywords)
                    <label><input class="keywords" type="checkbox" name="keywords"
                            value="{{ $keywords->search_keyword ?? '' }}">
                        {{ $keywords->search_keyword ?? '' }}
                        {{ ' (' . (new \App\Helpers\Helper())->counter($keywords->search_keyword ?? '') . ' times found)' }}
                    </label><br>
                @endforeach
            @endif


        </div>
        <div class="col-md-6">
            <label><strong>@lang('english.ALL_USERS') :</strong></label><br>
            @if (!empty($userArr))
                @foreach ($userArr as $user)
                    <label><input class="users" type="checkbox" name="users" value="{{ $user->id ?? '' }}">
                        {{ $user->name ?? '' }}
                    </label><br>
                @endforeach
            @endif
        </div>

    </div>
    <div class="row margin-top-20">

        <div class="col-md-6">
            <label><strong>@lang('english.TIME_RANGE') :</strong></label><br>
            <label><input class="time-range" type="checkbox" name="time_range" value="yesterday"> See data from
                yesterday</label><br>
            <label><input class="time-range" type="checkbox" name="time_range" value="last_week"> See data from last
                week</label><br>
            <label><input class="time-range" type="checkbox" name="time_range" value="last_month"> See data from last
                month</label>
        </div>
        <div class="col-md-6">
            <label><strong>@lang('english.SELECT_DATE') :</strong></label><br>
            <input id="dateFrom" type="date" name="form"> To
            <input id="dateTo" type="date" name="to">
        </div>
    </div>

    {{-- after ajax success -- all data show here --}}
    <div id="showData">


    </div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).on("change", ".keywords, .users, .time-range, #dateFrom, #dateTo", function() {
        var keywords = [];
        $("input:checkbox[name=keywords]:checked").each(function() {
            keywords.push($(this).val());
        });

        var users = [];
        $("input:checkbox[name=users]:checked").each(function() {
            users.push($(this).val());
        });

        var timeRange = [];
        $("input:checkbox[name=time_range]:checked").each(function() {
            timeRange.push($(this).val());
        });

        var dateFrom = '';
        var dateTo = '';
        var dateFrom = $('#dateFrom').val();
        var dateTo = $('#dateTo').val();
// alert(dateFrom);return false;
        $.ajax({
            url: '{{ URL::to('/searchHistory') }}',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                keywords: keywords,
                users: users,
                time_range: timeRange,
                date_from: dateFrom,
                date_to: dateTo,
            },
            beforeSend: function() {

            },
            success: function(res) {
                $('#showData').html(res.html);
            },
            error: function(jqXhr, ajaxOptions, thrownError) {}
        });

    });
</script>

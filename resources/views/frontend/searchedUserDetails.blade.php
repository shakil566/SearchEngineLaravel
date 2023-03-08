<div class="table-responsive table-bg margin-top-20">
    <h4 class="text-center"><strong>This details are already searched !</strong></h4><br>

    <table class="table table-hover" id="myTable">
        <thead>
            <tr class="center">
                <th class="text-center">@lang('english.SL_NO')</th>
                <th class="text-center">@lang('english.NAME')</th>
                <th class="text-center">@lang('english.EMAIL')</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($userArr))
                <?php
                $sl = 0;
                ?>

                @foreach ($userArr as $target)

                    <tr class="text-center">
                        <td>{{ ++$sl }}</td>
                        <td>{{ $target->name ?? '' }}</td>
                        <td>{{ $target->email ?? '' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">@lang('english.NO_USER_FOUND')</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

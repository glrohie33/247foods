<div class="row">
        <div class="col-12">
          <h5><label>{{ trans('My Refferals') }}</label></h5>
          <hr>
          <br>
          <table id="table_user_account_order_list" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
              <tr>
                <th>{{ trans('Id') }}</th>
                <th>{{ trans('User Email') }}</th>
                <th>{{ trans('User Name') }}</th>
                <th>{{ trans('Date') }}</th>
              </tr>
            </thead>
            <tbody>
              @if(count($all_refferals) > 0)
              <?php $i = 1; ?>
              @foreach($all_refferals as $row)
              <tr>
                <td>{{$i }}</td>
                <td>{!! $row['email'] !!}</td>
                <td>{!! $row['display_name'] !!}</td>
                <td>{!! Carbon\Carbon::parse($row['created_at'])->format('F d, Y') !!}</td>
              </tr>
              <?php $i++ ?>
              @endforeach
              @endif
            </tbody>
            <tfoot>
              <tr>
                    <th>{{ trans('Id') }}</th>
                    <th>{{ trans('User Email') }}</th>
                    <th>{{ trans('User Name') }}</th>
                    <th>{{ trans('Date') }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
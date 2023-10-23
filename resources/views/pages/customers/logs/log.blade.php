<div class="row">
    <div class="col-md-10">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="card-title">{{ $customer->cust_business_name ?? '' }} | Logs</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Logs</h3>
            </div>
            <form class="business-log-form">
                <input type="hidden" name="ff[cust_id]" value="{{ $customer->id ?? '' }}" />
                <div class="card-body">
                    <div class="direct-chat-messages">
                        <div class="direct-chat-msg">
                            @foreach ($custLogs as $log)
                                <div class="comment-text-wrapper">
                                    <div class="direct-chat-infos clearfix">
                                        <span
                                            class="direct-chat-timestamp">{{ \Carbon\Carbon::parse($log->created_at)->format('d-M-Y  g:i:s A') }}</span>
                                    </div>
                                    <div class="direct-chat-text">
                                        {{ $log->cust_log ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" name="ff[cust_log]" placeholder="Type Message ..."
                            class="form-control cust_log" onkeydown="return (event.keyCode!=13);">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-secondary logSubmit"><i
                                    class="fas fa-paper-plane"></i> &nbsp; Send</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex mb-4">
                    <h4 class="card-title my-auto"> Select Client</h4>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select class="form-control" wire:model="selected">
                                <option value="" selected disabled>Select</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">Choose</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            @if (!empty($selected))
            <div class="card-body">
                <div class="d-flex mb-4">
                    <h4 class="card-title my-auto">Client Settings - {{ $clientSelected['name'] }}</h4>
                </div>
                <x-alerts />
                <form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="coverage_reports">Coverage Reports</label>
                            <input type="checkbox" id="coverage_reports" wire:model="coverageReports"
                                {{ $coverageReports ?  "checked" : '' }}>
                        </div>
                        <div class="col-lg-12">
                            <label for="press_pieces">Press Pieces</label>
                            <input type="checkbox" id="press_pieces" wire:model="pressPieces"
                                {{ $pressPieces ?  "checked" : '' }}>
                        </div>
                        <div class="col-lg-12">
                            <label for="alerts">Alerts</label>
                            <input type="checkbox" id="alerts" wire:model="alerts" {{ $alerts ?  "checked" : '' }}>
                        </div>
                        <div class="col-lg-12">
                            <label for="social_shares">Social Shares</label>
                            <input type="checkbox" id="social_shares" wire:model="socialShares"
                                {{ $socialShares ?  "checked" : '' }}>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-block btn-dark">Update</button>
                        </div>

                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
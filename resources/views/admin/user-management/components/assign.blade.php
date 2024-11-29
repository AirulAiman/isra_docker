<div class="modal fade" id="assign-prj-to-user-{{ $users->user_id }}" tabindex="-1"
    aria-labelledby="assign-prj-to-user-{{ $users->user_id }}" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="assign">Assign Projects</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12 my-3">
                        <label class="form-label fw-bold" for="user_id{{ $users->user_id }}">
                            User ID:
                        </label>
                        <input class="form-control" type="text" id="user_id{{ $users->user_id }}"
                            value="{{ $users->user_id }}" disabled readonly>
                    </div>
                    <div class="col-12 my-3">
                        <label class="form-label fw-bold" for="user_id{{ $users->user_id }}">
                            Organization:
                        </label>
                        @if ($users->organization == null)
                            <input class="form-control" type="text" placeholder="No organization" disabled readonly>
                        @else
                            @for ($i = 0; $i < count($orgs); $i++)
                                @if ($orgs[$i]->org_id == $users->organization)
                                    <input class="form-control" type="text" id="user_org{{ $users->organization }}"
                                        placeholder="{{ $orgs[$i]->org_name }}" disabled readonly>
                                @endif
                            @endfor
                        @endif
                    </div>
                    <div class="col-12 my-3">
                        <label class="form-label fw-bold">
                            Projects:
                        </label>

                        @if ($users->organization == null)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>Please assign an organization first</p>
                                </li>
                            </ul>
                        @else
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="input-group">
                                        <label class="input-group-text">
                                            Insert Project
                                        </label>
                                        <form action="{{ route('user-management.assign') }}" method="POST" id="form-assign" name="form-assign">
                                            @csrf

                                            <input type="hidden" name="user" value="{{ $users->user_id }}">

                                            <select class="form-select" id="prj_id" name="project">
                                                <option value="" disabled selected>Choose a project...</option>
                                                @foreach ($prjs as $prj)
                                                    <option value="{{ $prj->prj_id }}">
                                                        {{ $prj->prj_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </li>
                                
                                {{-- if no assigned prjs, then tell user to assign --}}
                                {{-- @if ($ups->user == null)
                                    <li class="list-group-item">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-secondary text-center">
                                                please assign a project
                                            </li>
                                        </ul>
                                    </li>
                                @endif --}}


                                <li class="list-group-item">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-secondary text-center">
                                            Assigned
                                        </li>
                                        @foreach ($ups as $up)
                                            @foreach ($prjs as $prj)
                                                @if($prj->prj_id == $up->project)
                                                    <li class="list-group-item">
                                                        <b>{{ $loop->parent->iteration }}.</b> {{ $prj->prj_name }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-assign">Save</button>
            </div>

        </div>
    </div>
</div>

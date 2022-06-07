<div id="test_case_editor">

    <div class="d-flex justify-content-between border-bottom mt-2 pb-2 mb-2">
        <div>
            <span class="fs-5">Create New Test Case</span>
            <span class="text-muted"> | you can use markdown formatting</span>
        </div>

        <div>
            <button href="button" class="btn btn-outline-dark btn-sm" onclick="closeTestCaseEditor()">
                <i class="bi bi-x-lg"></i> <b>Cancel</b>
            </button>
        </div>
    </div>

    <div id="test_case_content">
        <div class="p-4 pt-0">

            <div class="row mb-3 border p-3 rounded">

                <div class="mb-3 d-flex justify-content-start border p-3 bg-light">

                    <div>
                        <label for="test_suite_id" class="form-label"><strong>Test Suite</strong></label>
                        <select name="suite_id" id="tce_test_suite_select" class="form-select border-secondary">

                            @foreach($repository->suites as $repoTestSuite)
                                <option value="{{$repoTestSuite->id}}"
                                        @if($repoTestSuite->id == $parentTestSuite->id)
                                        selected
                                    @endif
                                >
                                    {{$repoTestSuite->title}}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{--<i class=" fs-3 bi bi-chevron-double-up text-danger"></i>--}}
                    {{--<i class=" fs-3 bi bi-chevron-double-down text-warning"></i>--}}
                    {{--<i class=" fs-3 bi bi-list text-success"></i>--}}


                    <div class="mx-5">
                        <label class="form-label">
                            <b>Priority</b>
                            <i class="bi bi-chevron-double-up text-danger"></i>|<i class="bi bi-list text-info"></i>|<i class="bi bi-chevron-double-down text-warning"></i>
                        </label>

                        <select id="tce_priority_select" name="priority" class="form-select border-secondary">
                            <option value="{{\App\Enums\CasePriority::NORMAL}}" selected> Normal</option>
                            <option value="{{\App\Enums\CasePriority::HIGH}}">High</option>
                            <option value="{{\App\Enums\CasePriority::LOW}}">Low</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label"><b>Type</b> <i class="bi bi-person"></i> | <i class="bi bi-robot"></i></label>
                        <select name="automated" class="form-select border-secondary" id="tce_automated_select">
                            <option value="0" selected> Manual</option>
                            <option value="1">Automated</option>
                        </select>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="title" class="form-label"><b>Title</b></label>
                    <input name="title" id="tce_title_input" type="text" class="form-control border-secondary" >
                </div>

                <div class="col">
                    <label class="form-label"><b>Preconditions</b></label>
                    <textarea name="pre_conditions" class="form-control border-secondary" id="tce_preconditions_input" rows="3"></textarea>
                </div>

            </div>

            <div class="row mb-3 border p-3 rounded" id="steps_container">
                <p class="fs-5">Steps</p>

                <div class="row m-0 p-0 step">

                    <div class="col-auto p-0 pt-4">
                        <span class="fs-5 step_number">1</span>
                    </div>

                    <div class="col">
                        <label class="form-label m-0"><b>Action</b></label>
                        <textarea class="form-control border-secondary step_action" rows="2"></textarea>
                    </div>

                    <div class="col">
                        <label class="form-label m-0"><b>Expected Result</b></label>
                        <textarea class="form-control border-secondary step_result" rows="2"></textarea>
                    </div>

                    <div class="col-auto p-0 pt-4">
                        <button type="button" class="btn btn-outline-danger btn-sm step_delete_btn" onclick="removeStep(this)">
                            <i class="bi bi-x-circle"></i>
                        </button>
                    </div>

                </div>

            </div>

            <div class="row border mt-3 p-3 rounded d-flex justify-content-between" >

                <div class="col">
                    <button type="button" class="btn btn-primary" onclick="addStep()">
                        <i class="bi bi-plus-circle"></i>
                        Add Step
                    </button>
                </div>


                <div class="col d-flex justify-content-end pe-3">

                    <button id="tce_save_btn" type="button" class="btn btn-success me-3" onclick="createTestCase()">
                        Create
                    </button>

                    <button id="tce_save_btn" type="button" class="btn btn-success" onclick="createTestCase(true)">
                        Create and add another
                    </button>
                </div>
            </div>


        </div>
    </div>


</div>

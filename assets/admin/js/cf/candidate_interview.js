function CandidateInterview() {

    "use strict";

    var self = this;

    this.initFilters = function () {
        $("#status, #job_id, #user_id").off();
        $("#status, #job_id, #user_id").change(function () {
            self.initCandidateInterviewsDatatable();
        });
        $('.select2').select2({dir:$('#lang-dir').val() == 'rtl' ? 'rtl' : 'ltr'});
    };

    this.initCandidateInterviewsDatatable = function () {
        $('#candidate_interviews_datatable').DataTable({
            "aaSorting": [[ 4, 'desc' ]],
            "columnDefs": [{"orderable": false, "targets": [6]}],
            "lengthMenu": [[10, 25, 50, 100000000], [10, 25, 50, "All"]],
            "searchDelay": 2000,
            "processing": true,
            "serverSide": true,
            "language": {
                "decimal": "",
                "emptyTable": lang['no_data_available_in_table'],
                "info": lang['showing']+" _START_ "+lang['to']+" _END_ "+lang['of']+" _TOTAL_ "+lang['entries'],
                "infoEmpty": lang['showing']+" 0 "+lang['to']+" 0 of 0 "+lang['entries'],
                "infoFiltered": "("+lang['filtered_from']+" _MAX_ "+lang['total_entries']+")",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": lang['show']+" _MENU_ "+lang['entries'],
                "loadingRecords": lang['loading'],
                "processing": lang['processing'],
                "search": lang['search']+":",
                "zeroRecords": lang['no_matching_records_found'],
                "paginate": {
                    "first": lang['first'],
                    "last": lang['last'],
                    "next": lang['next'],
                    "previous": lang['previous']
                },
            },            
            "language": {
                "decimal": "",
                "emptyTable": lang['no_data_available_in_table'],
                "info": lang['showing']+" _START_ "+lang['to']+" _END_ "+lang['of']+" _TOTAL_ "+lang['entries'],
                "infoEmpty": lang['showing']+" 0 "+lang['to']+" 0 of 0 "+lang['entries'],
                "infoFiltered": "("+lang['filtered_from']+" _MAX_ "+lang['total_entries']+")",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": lang['show']+" _MENU_ "+lang['entries'],
                "loadingRecords": lang['loading'],
                "processing": lang['processing'],
                "search": lang['search']+":",
                "zeroRecords": lang['no_matching_records_found'],
                "paginate": {
                    "first": lang['first'],
                    "last": lang['last'],
                    "next": lang['next'],
                    "previous": lang['previous']
                },
            },
            "ajax": {
                "type": "POST",
                "url": application.url+'/admin/candidate-interviews/data',
                "data": function ( d ) {
                    d.status = $('#status').val();
                    d.job_id = $('#job_id').val();
                    d.user_id = $('#user_id').val();
                    d.csrf_token = application.csrf_token;
                },
                "complete": function (response) {
                    self.initCandidateInterviewViewForm();
                    $('.table-bordered').parent().attr('style', 'overflow:auto'); //For responsive
                },
            },
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'info': true,
            'autoWidth': true,
            'destroy':true,
            'stateSave': true
        });
    };

    this.initCandidateInterviewViewForm = function () {
        $('.view-or-conduct-candidate-interview').off();
        $('.view-or-conduct-candidate-interview').on('click', function () {
            var modal = '#modal-default';
            var id = $(this).data('id');
            $(modal).modal('show');
            $(modal+' .modal-title').html(lang['candidate_interview']);
            application.load('admin/candidate-interviews/view-or-conduct/'+id, modal+' .modal-body-container', function (result) {
                self.initCandidateInterviewSave();
                self.initPillRating();
            });
        });
    };

    this.initCandidateInterviewSave = function () {
        application.onSubmit('#interview_conduct_form', function (result) {
            application.showLoader('interview_conduct_form_button');
            application.post('admin/candidate-interviews/save', '#interview_conduct_form', function (res) {
                var result = JSON.parse(application.response);
                if (result.success === 'true') {
                    $('#modal-default').modal('hide');
                    self.initCandidateInterviewsDatatable();
                } else {
                    application.hideLoader('interview_conduct_form_button');
                    application.showMessages(result.messages, 'interview_conduct_form');
                }
            });
        });
    };

    this.initPillRating = function () {
        $('.pill-rating').barrating('show', {
            theme: 'bars-pill',
            initialRating: 'A',
            showValues: true,
            showSelectedRating: false,
            allowEmpty: true,
            emptyValue: '-- no rating selected --',
            onSelect: function(value, text) {}
        });
    };    
}

$(document).ready(function() {
    var candidate_interview = new CandidateInterview();
    candidate_interview.initFilters();
    candidate_interview.initCandidateInterviewsDatatable();
});

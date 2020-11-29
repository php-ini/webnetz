
<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Parmanently</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure about this ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" rel ='' id="confirm">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- Dialog show event handler -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.deleteForm').submit(function(e){
            e.preventDefault();
        });
    });

    $(".deleteForm").on('submit', function(){
        var id = $(this).find('.delete').attr('rel');
        $(".modal-footer #confirm").attr('rel' , id);
//        alert(id);

    });
    $('#confirmDelete').on('show.bs.modal', function (e) {
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body p').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);


        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');
        $(this).find('.modal-footer #confirm').data('form', form);
    });

    <!-- Form confirm (yes/ok) handler, submits form -->
    $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        var go = $(this).attr('rel');
        $("form[name=delete_" + go + "]").unbind('submit').submit();
//      $(this).data('.deleteClass').submit();
    });
</script>

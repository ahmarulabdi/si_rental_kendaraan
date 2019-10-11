$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        //alert("Adding control");
        e.preventDefault();

        var controlForm = $('form:first .tableForm'),
            currentEntry = controlForm.find('.controls:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('.form-control').val('');


    }).on('click', '.btn-remove', function(e)
    {
        var thisControl = $(this).parents('tr.controls');
        //if(!thisControl.is(':first-child'))
        if(thisControl.siblings().size() > 0)
            thisControl.remove();
        else
            alert('Minimal harus 1 buah tindakan');

		e.preventDefault();
		return false;
	});
});

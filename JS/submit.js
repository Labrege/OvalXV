function SubmitFormData() {
    var saveVideo = $("#submitFormData").val();
    $.post("submit.php", { saveVideo: saveVideo },
    function(data) {
	 $('#results').html(data);
    });
}
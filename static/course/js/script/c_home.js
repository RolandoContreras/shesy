function complete(course_id, video_id, total_videos) {
    if (course_id != null && video_id != null) {
        $.ajax({
            type: "post",
            url: site + "virtual/update_complete",
            dataType: "json",
            data: {course_id: course_id,
                   video_id: video_id,
                   total_videos:total_videos},
            success: function (data) {
                if (data.status == true) {
                    $( "#complete" ).addClass("completed");
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Hubo un error',
                        footer: 'Vuelva a intentarlo'
                    });

                }
            }
        });
    } else {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Hubo un error',
            footer: 'Vuelva a intentarlo'
        });
    }
}


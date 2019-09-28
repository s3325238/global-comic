
// Moderator
$('#moderator').on('change', function() {     
    $('.moderator').prop('checked', $(this).prop("checked"));              
});
//deselect "leader check", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
$('.moderator').change(function(){ //".checkbox" change 
    if($('.moderator:checked').length == $('.moderator').length){
            $('#moderator').prop('checked',true);
    }else{
            $('#moderator').prop('checked',false);
    }
});


$('#leader').on('change', function() {     
    $('.leaders').prop('checked', $(this).prop("checked"));              
});
//deselect "leader check", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
$('.leaders').change(function(){ //".checkbox" change 
    if($('.leaders:checked').length == $('.leaders').length){
            $('#leader').prop('checked',true);
    }else{
            $('#leader').prop('checked',false);
    }
});

$('#viceLeader').on('change', function() {     
    $('.leaders').prop('checked', $(this).prop("checked"));              
});
//deselect "leader check", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
$('.leaders').change(function(){ //".checkbox" change 
    if($('.leaders:checked').length == $('.leaders').length){
            $('#viceLeader').prop('checked',true);
    }else{
            $('#viceLeader').prop('checked',false);
    }
});

// Member
$('#member').on('change', function() {     
    $('.members').prop('checked', $(this).prop("checked"));              
});
//deselect "leader check", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
$('.members').change(function(){ //".checkbox" change 
    if($('.members:checked').length == $('.members').length){
            $('#member').prop('checked',true);
    }else{
            $('#member').prop('checked',false);
    }
});


//top level HTML5 UI controls for frameless user inteface

// - - - - - PHOTO GALLERY - - - - - -

var currentPhotoIndex=0;
var currentAuthor=0;
var currentMsg=0;
var galleryImages = [];

function setVerticaLayout()
{
    document.getElementById('frame1').style.float = 'left';
    document.getElementById('frame1').style.width = '50vw';
    document.getElementById('frame1').style.height = '90vh';
    document.getElementById('frame2').style.float = 'right';
    document.getElementById('frame2').style.width = '48vw';
    document.getElementById('frame2').style.height = '90vh';
    document.getElementById('hr1').style.display = 'none';
}

function openGallery()
{

    //initiate the gallery
    initGalleryImages();
    //display the Gallery UI.
    document.getElementById('gallery').style.display = 'block';
    document.getElementById('menu_cover').style.display = 'block';
    
}

function openPicInGallery(url, userId, messageId)
{
    //This function is called on click on an image
    alert(url + '-' + userId + '-' + messageId);
}

function closeGallery()
{
    document.getElementById('gallery').style.display = 'none';
    document.getElementById('menu_cover').style.display = 'none';
}

function nextPhoto()
{
    if((currentPhotoIndex + 2) < galleryImages.length)
        {
                currentPhotoIndex++;
                document.getElementById("currentPhoto").src = galleryImages[currentPhotoIndex][0];
                document.getElementById("gallery_author_name").text = galleryImages[currentPhotoIndex][1];
                document.getElementById("gallery_msg_title").text = galleryImages[currentPhotoIndex][2];
                currentMsg = galleryImages[currentPhotoIndex][3];
                currentAuthor = galleryImages[currentPhotoIndex][4];
        }
}

function prevPhoto()
{
    if((currentPhotoIndex - 1) < 0)return;
    currentPhotoIndex--;
    document.getElementById("currentPhoto").src = galleryImages[currentPhotoIndex][0];
    document.getElementById("gallery_author_name").text = galleryImages[currentPhotoIndex][1];
    document.getElementById("gallery_msg_title").text = galleryImages[currentPhotoIndex][2];
    currentMsg = galleryImages[currentPhotoIndex][3];
    currentAuthor = galleryImages[currentPhotoIndex][4];
}

function filterByName(userId)
{
    document.getElementById("gallery_title").text = galleryImages[currentPhotoIndex][1] + "'s Photo Gallery. ";
    $.post("gallery_api.php", {'get_imgUrls_and_Posts' : userId}, function(data,status)
    {
        galleryImages = $.map(data, function(value, index) {
        return [value];
    });
        currentPhotoIndex=0;
        document.getElementById("currentPhoto").src = galleryImages[currentPhotoIndex][0];
    });
}


function initGalleryImages()
{
    currentPhotoIndex=0;
    document.getElementById("gallery_title").text = "Photo Gallery: images from all users";
    $.post("gallery_api.php", {'get_imgUrls_and_Posts' : 'all'}, function(data,status)
    {
        galleryImages = $.map(data, function(value, index) {
        return [value];
        });
        document.getElementById("currentPhoto").src = galleryImages[currentPhotoIndex][0];
        document.getElementById("gallery_author_name").text = galleryImages[currentPhotoIndex][1];
        document.getElementById("gallery_msg_title").text = galleryImages[currentPhotoIndex][2];
        currentMsg = galleryImages[currentPhotoIndex][3];
        currentAuthor = galleryImages[currentPhotoIndex][4];
    });
}

function openMsg(msgId)
{
    closeGallery();
    document.getElementById("bottom").src="msg.php?id=" + currentMsg;
}


// - - - - - - - - - -
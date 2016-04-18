( function( $ ) {
    var index = 0,
        animations = [
                        new Animation($('.flexslider').first().height()-50, "#info-dances", "slide-in-after"),
                        new Animation( ($('.flexslider').first().height()+$("#info-dances").height())-50, "#profile", "fade-in-after")
                    ];

    function Animation(yTrigger, targetID, animClass){
        this.trigger = yTrigger;
        this.animTarget = targetID;
        this.animation = animClass;
    }

    function checkAnimation(){
        for(var i=0; i<animations.length; ++i){
            yScrollHandler();
        }
    }

    function yScrollHandler(){
        if(index < animations.length){
            if(window.pageYOffset > animations[index].trigger){
                //alert(window.innerHeight+" "+lastWinHeight+" "+document.body.height);
                //alert((window.pageYOffset+(window.innerHeight-lastWinHeight))+" "+window.innerHeight+" "+document.body.offsetHeight+" "+animations[index].trigger);
                $(animations[index].animTarget).addClass(animations[index].animation);
                ++index;
            }//end inner if
        }//end outerif
        else{
            window.onscroll = null;
        }
    }

    window.onscroll = yScrollHandler;
    checkAnimation();
    $('#dropdown-button').click(function(){
        $('#header-menu').slideToggle();
    });
} )( jQuery );
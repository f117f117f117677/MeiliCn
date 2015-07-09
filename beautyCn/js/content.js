/**
 * Created by newton on 8/7/15.
 */

$(document).ready(function () {

    var threedSrc = $('#threeD').attr('title');

    unityObject.embedUnity("unityPlayer",threedSrc,600,450);
})

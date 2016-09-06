'use strict'

$(document).ready ->
    svg4everybody()
    asyncLoadImg('data-img')
    asyncLoadBg('data-bg')
    return

$(window).load ->
    $('.collapse').collapse ->
        show: false
    return


fix_msie_slimscroll = () ->
    $('body').on 'mousewheel', ->
        if(detectIE())
            event.preventDefault()
            wheelDelta = event.wheelDelta
            currentScrollPosition = window.pageYOffset
            window.scrollTo 0, currentScrollPosition - wheelDelta
        return

    detectIE = ->
        ua = window.navigator.userAgent
        msie = ua.indexOf('MSIE ')
        if msie > 0
            return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10)
        trident = ua.indexOf('Trident/')
        if trident > 0
            rv = ua.indexOf('rv:')
            return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10)
        edge = ua.indexOf('Edge/')
        if edge > 0
            return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10)
        false

asyncLoadImg = (attr) ->
    attribute = attr
    $images = window.document.querySelectorAll('[' + attribute + ']')
    $src = ''
    if $images.length == undefined
        $images = [$images]
    [].forEach.call $images, ($image) ->
        $src = $image.getAttribute(attribute)
        $image.src = $src
        $image.removeAttribute attribute
        return
    return

asyncLoadBg = (attr) ->
    attribute = attr
    $images = window.document.querySelectorAll('[' + attribute + ']')
    $src = ''
    if $images.length == undefined
        $images = [$images]
    [].forEach.call $images, ($image) ->
        $src = $image.getAttribute(attribute)
        $image.style.backgroundImage = 'url(\'' + $src + '\')'
        $image.removeAttribute attribute
        return
    return
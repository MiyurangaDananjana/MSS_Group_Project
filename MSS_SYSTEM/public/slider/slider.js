/*! freshslider 27-09-2014 */ ! function(a) { a.fn.freshslider = function(b) { var c = this,
            d = "undefined" == typeof b.range ? !1 : b.range,
            e = !d,
            f = b.min || 0,
            g = b.max || 100,
            h = g - f,
            i = b.step || 1,
            j = b.unit || "",
            k = "undefined" == typeof b.enabled ? !0 : b.enabled,
            l = [0, 1],
            m = "undefined" == typeof b.text ? !0 : b.text,
            n = null; if (0 > h) throw new Error; var o = function(a) { return a && "[object Function]" == Object.prototype.toString.call(a) },
            p = null;
        o(b.onchange) === !0 && (p = b.onchange); var q = "" + i,
            r = 0;
        q.indexOf(".") >= 0 && (r = q.length - q.indexOf(".") - 1), b.hasOwnProperty("value") ? e ? l[1] = (b.value - f) / h : b.value.length && 2 == b.value.length && (l[0] = (b.value[0] - f) / h, l[1] = (b.value[1] - f) / h) : e && (l[1] = .5), n = d ? this.html("<div class='fsslider'><div class='fsfull-value'></div><div class='fssel-value'></div><div class='fscaret fss-left'></div><div class='fscaret fss-right'></div></div>").find(".fsslider") : this.html("<div class='fsslider'><div class='fsfull-value'></div><div class='fssel-value'></div><div class='fscaret'></div></div>").find(".fsslider"); var s = a(this.find(".fscaret")[0]),
            t = e ? s : a(this.find(".fscaret")[1]),
            u = this.find(".fssel-value"),
            v = function(a) { return i * Math.round(a / i) },
            w = function() { m && (t.text((v(l[1] * h) + f).toFixed(r) + j), e || s.text((v(l[0] * h) + f).toFixed(r) + j)); var a = c.width(),
                    b = s.outerWidth(),
                    d = t.outerWidth(),
                    g = a - (b + d) / 2;
                u.css({ left: l[0] * a, width: (l[1] - l[0]) * a }), s.css({ left: l[0] * g + b / 2, "margin-left": -(b / 2), "z-index": x ? 0 : 1 }), t.css({ left: l[1] * g + d / 2, "margin-left": -(d / 2), "z-index": x ? 1 : 0 }), p && (e ? p(v(l[1] * h) + f) : p(v(l[0] * h) + f, v(l[1] * h) + f)) },
            x = !0,
            y = !1;
        this.mousedown(function(a) { if (k) { y = !0; var b = c.width(),
                    d = s.outerWidth(),
                    f = t.outerWidth(),
                    g = b - (d + f) / 2,
                    h = a.target,
                    i = h.className,
                    j = a.pageX - c.offset().left,
                    m = j - d / 2; if (m = 0 > m ? 0 : m > g ? g : m, e) l[1] = m / g, x = !0;
                else switch (i) {
                    case "fscaret fss-left":
                        x = !1, l[0] = m / g; break;
                    case "fscaret fss-right":
                        x = !0, l[1] = m / g; break;
                    default:
                        m < (l[0] + l[1]) / 2 * g ? (x = !1, l[0] = m / g) : (x = !0, l[1] = m / g) }
                return w(), event.preventDefault ? void event.preventDefault() : !1 } }); var z = function() { k && (y = !1, l[1] = v(l[1] * h) / h, e || (l[0] = v(l[0] * h) / h), w()) }; return a(document).mouseup(function() { y && z() }), this.mousemove(function(a) { if (k) { if (y) { var b = c.width(),
                        d = s.outerWidth(),
                        f = t.outerWidth(),
                        g = b - (d + f) / 2,
                        h = a.target,
                        i = (h.className, a.pageX - c.offset().left),
                        j = i - d / 2;
                    j = 0 > j ? 0 : j > g ? g : j, e ? (l[1] = j / g, x = !0) : x ? (l[1] = j / g, l[1] < l[0] && (l[1] = l[0])) : (l[0] = j / g, l[0] > l[1] && (l[0] = l[1])), w() } return event.preventDefault ? void event.preventDefault() : !1 } }), this.getValue = function() { return e ? [l[1] * h + f] : [l[0] * h + f, l[1] * h + f] }, this.setValue = function() { e ? (l[1] = (arguments[0] - f) / h, w()) : arguments.length >= 2 && (l[0] = (arguments[0] - f) / h, l[1] = (arguments[1] - f) / h, w()) }, this.setEnabled = function(a) { k = "undefined" == typeof a ? !0 : a, k ? n.removeClass("fsdisabled") : n.addClass("fsdisabled") }, this.setEnabled(k), w(), this } }(jQuery);
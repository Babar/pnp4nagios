<?php
# +------------------------------------------------------------------+
# |           _           _           _       _   __   _____         |
# |        __| |_  ___ __| |__  _ __ | |__   / | /  \ |__ / |        |
# |       / _| ' \/ -_) _| / / | '  \| / /   | || () | |_ \ |        |
# |       \__|_||_\___\__|_\_\_|_|_|_|_\_\   |_(_)__(_)___/_|        |
# |                                            check_mk 1.0.31       |
# |                                                                  |
# | Copyright Mathias Kettner 2009                mk@mathias-kettner |
# +------------------------------------------------------------------+
# 
# This file is part of check_mk 1.0.31.
# The official homepage is at http://mathias-kettner.de/check_mk.
# 
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.


$opt[1] = "--vertical-label 'Celsius' -l0 -u60 --title \"IPMI temperature sensors $hostname\" ";

$def[1] = "DEF:temp=$RRDFILE[1]:$DS[1]:MIN ";
$def[1] .= "AREA:temp#ffd040:\"Average ambient temperature\" ";
$def[1] .= "LINE:temp#ff8000 ";

?>

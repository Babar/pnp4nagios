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


$instname = substr($servicedesc, 3);
$opt[1] = "-l0 -u100 --title \"Free Session Slots $instname\" ";

$def[1] = "DEF:slots=$rrdfile:$DS[1]:MIN "; 
$def[1] .= "AREA:slots#20ff80:\"Free Session Slots\" "; 
$def[1] .= "HRULE:$WARN[1]#ffff00:\"Warning at $WARN[1] \" ";
$def[1] .= "HRULE:$CRIT[1]#ff0000:\"Critical at $CRIT[1] \\n\" ";       

?>

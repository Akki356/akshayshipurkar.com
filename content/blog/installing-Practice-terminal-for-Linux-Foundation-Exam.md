+++
categories = ["Milestone"]
comments = true
date = 2018-02-27T20:13:34+05:30
showpagemeta = true
showcomments = true
slug = ""
tags = ["LFCS", "Linux Foundation", "GateOne", "Docker"]
title = "Installing Practice Terminal For Linux Foundation Exam"
description = "Practice terminal for exam"
+++


  <link rel="stylesheet" type="text/css" href="/css/asciinema-player.css" />

<asciinema-player src="/asciinema/git-rec.cast"></asciinema-player>

<script src="/js/asciinema-player.js"></script>
I have had a tough time installing gateone terminal for practicing for openstack coa exam. It could be frustrating and time consuming to install and get gateone terminal running. After lot of searching and toiling over this problem i finally found the solution. Its one liner but you need to have docker installed on your machine before you can run it.

Here goes the command.

`docker run --name gateone -p 443:10443 -p 2345:22 -d greyltc/gateone`

after the installation is done head to chrome / firefox (chrome is the default for Linux foundation exams).

Open https://localhost and get started with your practice for your exams :).

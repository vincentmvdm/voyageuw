#!/usr/bin/env bash
docker rm -f voyageuw
docker run -d -p 80:80 --name voyageuw voyageuw

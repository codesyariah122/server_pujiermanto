#!/bin/bash
 netstat -an | awk '/^tcp/ {A[$(NF)]++} END {for (I in A) {printf "%5d %s\n", A[I], I}}'

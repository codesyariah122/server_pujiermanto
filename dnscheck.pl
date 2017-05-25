#!/usr/bin/perl -w
use strict;
while () {
my $date = localtime(time());
        open(CH,"dig \@192.168.1.252 google.com |") || die "cannot run dig: $!\n";
        while (<CH>) {
                chomp;
                next unless /query time/i;
                print $date . "$_\n";
        };
        close CH;
        open(CH,"dig \@192.168.1.252 google.com |") || die "cannot run dig: $!\n";
        while (<CH>) {
                chomp;
                next unless /query time/i;
                print $date . "$_\n";
        };
        close CH; 

        sleep 10;
};

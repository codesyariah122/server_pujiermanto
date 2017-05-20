#!/usr/bin/perl -w
use strict;
while () {
my $date = localtime(time());
        open(CH,"dig \@195.60.0.1 www.bbc.co.uk |") || die "cannot run dig: $!\n";
        while (<CH>) {
                chomp;
                next unless /query time/i;
                print $date . "$_\n";
        };
        close CH;
        open(CH,"dig \@195.60.0.5 www.bbc.co.uk |") || die "cannot run dig: $!\n";
        while (<CH>) {
                chomp;
                next unless /query time/i;
                print $date . "$_\n";
        };
        close CH; 

        sleep 10;
};

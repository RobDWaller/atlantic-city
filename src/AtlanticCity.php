<?php

declare(strict_types=1);

namespace App;

class AtlanticCity
{
    private const LYRICS = [
        "Well they blew up the chicken man in Philly last night",
        "Now they blew up his house too",
        "Down on the boardwalk they're getting ready for a fight",
        "Gonna see what them racket boys can do",
        "Now there's trouble busting in from outta state",
        "And the D.A. can't get no relief",
        "Gonna be a rumble out on the promenade",
        "And the gambling commissions hanging on by the skin of its teeth",
        "Well now everything dies baby that's a fact",
        "But maybe everything that dies someday comes back",
        "Put your makeup on, fix your hair up pretty",
        "And meet me tonight in Atlantic City",
        "Well I got a job and tried to put my money away",
        "But I got debts that no honest man can pay",
        "So I drew what I had from the Central Trust",
        "And I bought us two tickets on that Coast City bus",
        "Now baby everything dies baby that's a fact",
        "But maybe everything that dies someday comes back",
        "Put your makeup on, fix your hair up pretty",
        "And meet me tonight in Atlantic City",
        "Now our luck may have died and our love may be cold",
        "But with you forever I'll stay",
        "We're going out where the sand's turning to gold",
        "So put on your stockings, baby, 'cause the night's getting cold",
        "And maybe everything dies, that's a fact",
        "But maybe everything that dies someday comes back",
        "Now I've been looking for a job but it's hard to find",
        "Down here it's just winners and losers and don't get caught on the wrong side of that line",
        "Well I'm tired of coming out on this losing end",
        "So honey last night I met this guy and I'm gonna do a little favor for him",
        "Well I guess everything dies baby that's a fact",
        "But maybe everything that dies someday comes back",
        "Put your hair up nice and set up pretty",
        "And meet me tonight in Atlantic City",
        "Meet me tonight in Atlantic City"
    ];

    private function getLyrics(): array
    {
        return self::LYRICS;
    }

    private function getRandomLyric(): string
    {
        return $this->getLyrics()[rand(0, 34)];
    }

    private function getCss(): string
    {
        $float = is_rtl() ? 'left' : 'right';

        return "<style type='text/css'>" .
            "#atlantic {" .
                "float: $float;" .
                "padding-$float: 15px;" .
                "padding-top: 5px;" .
                "margin: 0;" .
                "font-size: 11px;" .
            "}" .
            "</style>";
    }

    private function getHtmlOutput(): string
    {
        return '<p id="atlantic">' . $this->getRandomLyric() . '</p>';
    }

    public function atlanticCity(): void
    {
        echo $this->getHtmlOutput();
    }

    public function atlanticCss(): void
    {
        echo $this->getCss();
    }
}

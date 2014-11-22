<?php
/**
 * HALTest.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 30/10/14
 */
namespace PHPGames\Tests\Console\Helper;

use PHPGames\Console\Helper\HAL;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\StreamOutput;

class HALTest extends \PHPUnit_Framework_TestCase
{
    public function testSayHello()
    {
        $hal = new HAL($output = $this->getOutputStream(false), false, false);
        $hal->sayHello();

        rewind($output->getStream());

        $this->assertEquals(
            $this->generateOutput("").
            $this->generateOutput("                            ").
            $this->generateOutput("                                   ").
            $this->generateOutput("                                       ").
            $this->generateOutput("                                         ").
            $this->generateOutput("                                         ").
            $this->generateOutput("                                           ").
            $this->generateOutput("                                            ").
            $this->generateOutput("                                             ").
            $this->generateOutput("                                             ").
            $this->generateOutput("                                              ").
            $this->generateOutput("                                              ").
            $this->generateOutput("                                             ").
            $this->generateOutput("                                             ").
            $this->generateOutput("                                            ").
            $this->generateOutput("                                           ").
            $this->generateOutput("                                          ").
            $this->generateOutput("                                        ").
            $this->generateOutput("                                      ").
            $this->generateOutput("                                    ").
            $this->generateOutput("                             ").
            $this->generateOutput(""),
            stream_get_contents($output->getStream())
        );
    }

    public function testSayHelloCentered()
    {
        $screeSize = $this->getScreenSize();

        $numberOfSpaces = floor(($screeSize[0] - 46) / 2);
        if ($numberOfSpaces > 0) {
            $spaces = str_repeat(' ', $numberOfSpaces);
        } else {
            $spaces = '';
        }

        $hal = new HAL($output = $this->getOutputStream(false), false);
        $hal->sayHello();

        rewind($output->getStream());

        $this->assertEquals(
            $this->generateOutput($spaces . "").
            $this->generateOutput($spaces . "                            ").
            $this->generateOutput($spaces . "                                   ").
            $this->generateOutput($spaces . "                                       ").
            $this->generateOutput($spaces . "                                         ").
            $this->generateOutput($spaces . "                                         ").
            $this->generateOutput($spaces . "                                           ").
            $this->generateOutput($spaces . "                                            ").
            $this->generateOutput($spaces . "                                             ").
            $this->generateOutput($spaces . "                                             ").
            $this->generateOutput($spaces . "                                              ").
            $this->generateOutput($spaces . "                                              ").
            $this->generateOutput($spaces . "                                             ").
            $this->generateOutput($spaces . "                                             ").
            $this->generateOutput($spaces . "                                            ").
            $this->generateOutput($spaces . "                                           ").
            $this->generateOutput($spaces . "                                          ").
            $this->generateOutput($spaces . "                                        ").
            $this->generateOutput($spaces . "                                      ").
            $this->generateOutput($spaces . "                                    ").
            $this->generateOutput($spaces . "                             ").
            $this->generateOutput($spaces . ""),
            stream_get_contents($output->getStream())
        );
    }

    public function testSayHelloWithText()
    {
        $hal = new HAL($output = $this->getOutputStream(false), true, false);
        $hal->sayHello();

        rewind($output->getStream());

        $this->assertEquals(
            $this->generateOutput("").
            $this->generateOutput("                                                               ").
            $this->generateOutput("                                                                      ").
            $this->generateOutput("                                                                          ").
            $this->generateOutput("                                                                            ").
            $this->generateOutput("                                                                            ").
            $this->generateOutput("                                                                              ").
            $this->generateOutput("                                                                               ").
            $this->generateOutput("                                                                                ").
            $this->generateOutput("                                                                                ").
            $this->generateOutput("                                                                                 ").
            $this->generateOutput("                                                                                 ").
            $this->generateOutput("                                                                                ").
            $this->generateOutput("                                                                                ").
            $this->generateOutput("                                                                               ").
            $this->generateOutput("                                                                              ").
            $this->generateOutput("                                                                             ").
            $this->generateOutput("                                                                           ").
            $this->generateOutput("                                                                         ").
            $this->generateOutput("                                                                       ").
            $this->generateOutput("                                                                ").
            $this->generateOutput("").
            $this->generateOutput("").
            $this->generateOutput("                                                                                                           :#######'").
            $this->generateOutput(" @      :@ @@@@@@@@@ :@         @         +@@@@@@@@;         .@@@@@@@@+   @@@@@@@   @@@     @. @@@@@@@@@  +@@@@@@@@@@").
            $this->generateOutput(",@.     #@ @@@@@@@@@ @@        `@.        @@@@@@@@@@         #@@@@@@@@@  ;@@@@@@@.  @@@`    @',@@@@@@@@@  @@@@@@@@@@@").
            $this->generateOutput(",@.     #@ @:        #@        `@.        @@    #@@@         #@      @@  ;@    `@.  @@@`    @',@.         @@@@@@@@@@@").
            $this->generateOutput(",@,     #@ @:        #@        `@.        @@    #@@@         #@      @@  ;@    `@.  @@@`    @',@.         @@@@@@@@@@@").
            $this->generateOutput(",@.     #@ @@##@@@@+ #@        `@.        @@    #@@@         #@      @@  '@#####@#; @@@.  ,@@',@###@@@@'  @@@@@@@@@@@").
            $this->generateOutput(",@@@@@@@@@ @@@@@@@@@ #@        `@.        @@    '@@@         #@      @@  ;@@@@@@@@@ @@@`  @@@;,@@@@@@@@@  @@@@@@@@@@@").
            $this->generateOutput(":@@@@@@@@@ @@@       #@@@      `@@@       @@      @@         @@@+    @@ @@@      @@  .@.  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput(":@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@.  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput(":@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@.  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput(":@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@`  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput(":@@@    #@ @@@@@@@@@ #@@@@@@@@@`@@@@@@@@@ @@@@@@@@@@         @@@@@@@@@@ @@@      @@  .@@@@@@  ,@@@@@@@@@  @@@@@@@@@@@").
            $this->generateOutput(" '',     ' '';;'''''  ''''''''` ''''''''' ,####+'''.         .@@@@#'''; ;''      .;   ';;;;,   '';;'''''   @@@@@@@@@:").
            $this->generateOutput(""),
            stream_get_contents($output->getStream())
        );
    }

    public function testSayHelloWithTextCentered()
    {
        $screeSize = $this->getScreenSize();

        $numberOfSpaces = floor(($screeSize[0] - 117) / 2);
        if ($numberOfSpaces > 0) {
            $spaces = str_repeat(' ', $numberOfSpaces);
        } else {
            $spaces = '';
        }

        $hal = new HAL($output = $this->getOutputStream(false));
        $hal->sayHello();

        rewind($output->getStream());

        $this->assertEquals(
            $this->generateOutput($spaces . "").
            $this->generateOutput($spaces . "                                                               ").
            $this->generateOutput($spaces . "                                                                      ").
            $this->generateOutput($spaces . "                                                                          ").
            $this->generateOutput($spaces . "                                                                            ").
            $this->generateOutput($spaces . "                                                                            ").
            $this->generateOutput($spaces . "                                                                              ").
            $this->generateOutput($spaces . "                                                                               ").
            $this->generateOutput($spaces . "                                                                                ").
            $this->generateOutput($spaces . "                                                                                ").
            $this->generateOutput($spaces . "                                                                                 ").
            $this->generateOutput($spaces . "                                                                                 ").
            $this->generateOutput($spaces . "                                                                                ").
            $this->generateOutput($spaces . "                                                                                ").
            $this->generateOutput($spaces . "                                                                               ").
            $this->generateOutput($spaces . "                                                                              ").
            $this->generateOutput($spaces . "                                                                             ").
            $this->generateOutput($spaces . "                                                                           ").
            $this->generateOutput($spaces . "                                                                         ").
            $this->generateOutput($spaces . "                                                                       ").
            $this->generateOutput($spaces . "                                                                ").
            $this->generateOutput($spaces . "").
            $this->generateOutput($spaces . "").
            $this->generateOutput($spaces . "                                                                                                           :#######'").
            $this->generateOutput($spaces . " @      :@ @@@@@@@@@ :@         @         +@@@@@@@@;         .@@@@@@@@+   @@@@@@@   @@@     @. @@@@@@@@@  +@@@@@@@@@@").
            $this->generateOutput($spaces . ",@.     #@ @@@@@@@@@ @@        `@.        @@@@@@@@@@         #@@@@@@@@@  ;@@@@@@@.  @@@`    @',@@@@@@@@@  @@@@@@@@@@@").
            $this->generateOutput($spaces . ",@.     #@ @:        #@        `@.        @@    #@@@         #@      @@  ;@    `@.  @@@`    @',@.         @@@@@@@@@@@").
            $this->generateOutput($spaces . ",@,     #@ @:        #@        `@.        @@    #@@@         #@      @@  ;@    `@.  @@@`    @',@.         @@@@@@@@@@@").
            $this->generateOutput($spaces . ",@.     #@ @@##@@@@+ #@        `@.        @@    #@@@         #@      @@  '@#####@#; @@@.  ,@@',@###@@@@'  @@@@@@@@@@@").
            $this->generateOutput($spaces . ",@@@@@@@@@ @@@@@@@@@ #@        `@.        @@    '@@@         #@      @@  ;@@@@@@@@@ @@@`  @@@;,@@@@@@@@@  @@@@@@@@@@@").
            $this->generateOutput($spaces . ":@@@@@@@@@ @@@       #@@@      `@@@       @@      @@         @@@+    @@ @@@      @@  .@.  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput($spaces . ":@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@.  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput($spaces . ":@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@.  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput($spaces . ":@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@`  @@  ,@@@        @@@@@@@@@@@").
            $this->generateOutput($spaces . ":@@@    #@ @@@@@@@@@ #@@@@@@@@@`@@@@@@@@@ @@@@@@@@@@         @@@@@@@@@@ @@@      @@  .@@@@@@  ,@@@@@@@@@  @@@@@@@@@@@").
            $this->generateOutput($spaces . " '',     ' '';;'''''  ''''''''` ''''''''' ,####+'''.         .@@@@#'''; ;''      .;   ';;;;,   '';;'''''   @@@@@@@@@:").
            $this->generateOutput($spaces . ""),
            stream_get_contents($output->getStream())
        );
    }

    protected function getScreenSize()
    {
        $application = new Application();
        $screenSize = $application->getTerminalDimensions();
        unset($application);

        return $screenSize;
    }

    protected function generateOutput($expected)
    {
        $count = substr_count($expected, "\n");

        return $expected . ($count ? "" : "\n");
    }

    protected function getOutputStream($decorated = true, $verbosity = StreamOutput::VERBOSITY_NORMAL)
    {
        return new StreamOutput(fopen('php://memory', 'r+', false), $verbosity, $decorated);
    }
}

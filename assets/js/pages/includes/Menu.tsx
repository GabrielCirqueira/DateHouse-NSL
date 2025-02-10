import { Box, Flex, Accordion, AccordionItem, AccordionButton, AccordionPanel, AccordionIcon, VStack, Text } from "@chakra-ui/react";
import { Link } from "react-router-dom";

export function Menu(){
  return (
    <Box w={"250px"} p={4} bg={"#343a40"} color={"white"} minH="100vh">
      <Accordion allowToggle>
        <AccordionItem>
          <AccordionButton>
            <Box flex="1" textAlign="left">Menu 1</Box>
            <AccordionIcon />
          </AccordionButton>
          <AccordionPanel pb={4}>
            <VStack align="start">
              <Link to="/page1">Página 1</Link>
              <Link to="/page2">Página 2</Link>
            </VStack>
          </AccordionPanel>
        </AccordionItem>
        <AccordionItem>
          <AccordionButton>
            <Box flex="1" textAlign="left">Menu 2</Box>
            <AccordionIcon />
          </AccordionButton>
          <AccordionPanel pb={4}>
            <VStack align="start">
              <Link to="/page3">Página 3</Link>
              <Link to="/page4">Página 4</Link>
            </VStack>
          </AccordionPanel>
        </AccordionItem>
      </Accordion>
    </Box>
  );
};
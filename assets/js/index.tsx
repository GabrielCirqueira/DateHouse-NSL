import ReactDOM from 'react-dom/client'
import { ChakraProvider } from '@chakra-ui/react'
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { HelloWorld } from '@pages/HelloWorld';
import { Container } from '@pages/includes/Container';

const element = document.getElementById('root') as HTMLElement;
const root = ReactDOM.createRoot(element);

root.render(
  <ChakraProvider>
    <Router>
      <Routes>
        <Route path="/" element={<HelloWorld />} />
        <Route path="/adicionar-turma" element={<Container />} />
      </Routes>
    </Router>
  </ChakraProvider>
);

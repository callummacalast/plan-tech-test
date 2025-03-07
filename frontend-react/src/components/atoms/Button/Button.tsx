import React from 'react'

type ButtonProps = {
  children?: React.ReactNode
  type: 'button' | 'submit' | 'reset' | undefined
  onClick?: () => void
  className?: string
}
const Button = ({ children, type, onClick, ...props }: ButtonProps) => {
  return (
    <button type={type} onClick={onClick} {...props}>
      {children}
    </button>
  )
}

export default Button
